import AdminPanel from './pages/_layout/_admin-panel'

export const loginRouter = {
  path: '/',
  name: 'login',
  component: require('./pages/auth/login')
};

export const pageNotFound = {
  path: '/*',
  name: 'error-404',
  component: require('./pages/errors/404')
};

export const dashboardRouter = {
  path: '/dashboard',
  component: AdminPanel,
  children: [
    {
      path: '',
      name: 'dashboard',
      component: require('./pages/admin-panel/dashboard'),
      meta: { requiresAuth: true }
    },
  ]
};

export const userRouter = {
  path: '/admin',
  component: AdminPanel,
  children: [
    {
      path: '',
      name: 'admin',
      component: require('./pages/admin-panel/admin/index'),
      meta: { requiresAuth: true }
    },
    {
      path: 'create',
      name: 'create-admin',
      component: require('./pages/admin-panel/admin/create'),
      meta: { requiresAuth: true }
    },
  ]
};

export const routers = [
  loginRouter,
  dashboardRouter,
  userRouter,
  pageNotFound
];
