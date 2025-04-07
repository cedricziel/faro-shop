import http from 'k6/http';
import { check, sleep } from 'k6';
import { browser } from 'k6/browser';

export const options = {
    scenarios: {
        ui: {
            executor: 'shared-iterations',
            iterations: 200,
            options: {
                browser: {
                    type: 'chromium',
                },
            },
        },
    },
    thresholds: {
        checks: ["rate==1.0"]
    }
}

// set cloud options if K&_CLOUD_TOKEN is set
if (__ENV.K6_CLOUD_TOKEN) {
    options.cloud = {
        projectID: __ENV.CLOUD_PROJECT_ID,
        testID: __ENV.CLOUD_TEST_ID,
    }
}

export default async function () {
    const context = await browser.newContext();
    const page = await context.newPage();

    http.get(`http://${__ENV.WEB_HOST}`);
    sleep(1);

    try {
        await page.goto(`http://${__ENV.WEB_HOST}`);
        sleep(1);

        const productToFind = Math.floor(Math.random() * 9) + 1;

        const detailPageButton = page.locator(`#product-list div.product:nth-child(${productToFind}) a.btn`);

        await Promise.all([page.waitForNavigation(), detailPageButton.click()]);
        sleep(1);

        check(page.locator('h1'), {
            'header': async (h1) => (await h1.textContent()) == 'Faros',
        });

        // Product detail page
        await page.locator('input[name="add_to_cart[quantity]"]').type(1);
        const addButton = page.locator('button#add_to_cart_add')

        await Promise.all([page.waitForNavigation(), addButton.click()]);
        sleep(1);

        // checkout
        const checkoutButton = page.locator('a#checkout');

        await Promise.all([page.waitForNavigation(), checkoutButton.click()]);
        sleep(1);

        check(page.locator('h1'), {
            'header': async (h1) => (await h1.textContent()) == 'Checkout Succeeded!',
        });

        await page.waitForTimeout(5000);
    } finally {
        await page.close();
    }
}
