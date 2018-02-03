// import Dashboard from './pages/admin-panel/dashboard'
// import Index from './pages/admin-panel/user/index'

export const dashboardRouter = {
  path: '/',
  name: 'dashboard',
  component: require('./pages/admin-panel/dashboard')
};

export const userRouter = {
  path: '/users',
  name: 'users',
  component: require('./pages/admin-panel/user/index')
};

export const pageNotFound = {
  path: '/*',
  name: 'error-404',
  component: require('./pages/404')
};

export const routers = [
  dashboardRouter,
  userRouter,
  pageNotFound
];
