import './styles/app.css';

import {initializeFaro} from './scripts/faro';

const faroInstance = initializeFaro();

global.faro = faroInstance;
