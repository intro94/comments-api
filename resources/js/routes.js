import Index from "./components/pages/Index";
import http_404 from "./components/errors/http.404";

const routes = [
    { path: '/', component: Index },
    { path: '*', component: http_404 },
];

export default routes
