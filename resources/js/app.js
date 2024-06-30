require('./bootstrap');
/* require('laravel-datatables-vite'); */

import ReactDom from 'react-dom';
import App from './components/App';

ReactDom.render(<App /> , document.getElementById('app'));
