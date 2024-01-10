import http from 'k6/http';
import { check, sleep } from 'k6';
import { browser } from 'k6/experimental/browser';

export const options = {
    scenarios: {
        ui: {
            executor: 'shared-iterations',
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

export default async function () {
    const context = browser.newContext();
    const page = context.newPage();

    http.get(`http://${__ENV.WEB_HOST}`);
    sleep(1);

    try {
        await page.goto(`http://${__ENV.WEB_HOST}`);

        const detailPageButton = page.locator('.card-body a.btn');

        await Promise.all([page.waitForNavigation(), detailPageButton.click()]);

        check(page, {
            'header': p => p.locator('h1').textContent() == 'Faros',
        });

        // Product detail page
        page.locator('input[name="add_to_cart[quantity]"]').type(1);
        const addButton = page.locator('button#add_to_cart_add')

        await Promise.all([page.waitForNavigation(), addButton.click()]);

        // cart
        const cartButton = page.locator('.navbar-nav a.btn');

        await Promise.all([page.waitForNavigation(), cartButton.click()]);

        // checkout
        const checkoutButton = page.locator('a#checkout');

        await Promise.all([page.waitForNavigation(), checkoutButton.click()]);
    } finally {
        page.close();
    }
}
