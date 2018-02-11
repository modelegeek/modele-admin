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
      component: require('./pages/admin-panel/dashboard')
    },
  ]
};

export const userRouter = {
  path: '/users',
  component: AdminPanel,
  children: [
    {
      path: '',
      name: 'users',
      component: require('./pages/admin-panel/user/index')
    },
  ]
};

export const routers = [
  loginRouter,
  dashboardRouter,
  userRouter,
  pageNotFound
];
