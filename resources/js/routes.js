import ProductIndex from './components/products/index.vue';
import ProductCreate from './components/products/create.vue';
import ProductEdit from './components/products/edit.vue';
import ProductPower from './components/products/power.vue';
import WrestlingIndex from './components/wrestling/index.vue';
import NewWrestler from './components/wrestling/create.vue';
import FileTest from './components/test/index.vue';

export const routes = [
    {
        path: '/products',
        component: ProductIndex,
        name: "ProductIndex"
    },
    {
        path: '/products/create',
        component: ProductCreate,
        name: "ProductCreate"
    },
    {
        path: '/products/edit/:id',
        component: ProductEdit,
        name: "ProductEdit"
    },
    {
        path: '/products/power',
        component: ProductPower,
        name: "ProductPower"
    },
    {
        path: '/wrestling',
        component: WrestlingIndex,
        name: "WrestlingIndex"
    },
    {
        path: '/wrestling/create',
        component: NewWrestler,
        name: "NewWrestler"
    },
    {
        path: '/test',
        component: FileTest,
        name: "FileTest"
    }
];