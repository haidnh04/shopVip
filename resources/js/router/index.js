const routes = [
    { path: '/admin/user1s/list', name: 'list', component: () => import('@/components/users/UserList.vue') },


]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router