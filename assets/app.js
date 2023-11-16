import './styles/app.css';

import {initializeFaro} from './scripts/faro';

document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        global.faro = initializeFaro();
    }
};
