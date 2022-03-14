import Vue from 'vue';

let loader = null;

function displayLoader(loadingText = 'Loading..') {
    loader = Vue.prototype.$loading({
        lock: true,
        text: loadingText,
        spinner: 'el-icon-loading',
        background: 'rgba(255,255,255, 0.85)',
    });
}

function removeLoader() {
    loader.close();
}

export const saveUser = ({ commit }, payload) => {
    displayLoader();

    axios.post(`/admin/user1s/store`, payload).then(res => {
        Vue.prototype.$notify({
            title: 'Success',
            message: 'Thành viên thêm thành công',
            type: 'success',
        })

        removeLoader();

        setTimeout(() => {
            window.location.href = '/admin/user1s/list'
        }, 2000);
    })
}

export const getUsers = ({ commit }, payload) => {
    axios.get(`/admin/user1s/getUsers`, payload)
        .then(response => {
            commit('setTableData', response.data);
        })
}


export const updateUsers = ({ commit }, payload) => {

    displayLoader('Cập nhật thành viên');

    axios.put(`/admin/user1s/update/${payload.id}`, payload.form).then(res => {
        Vue.prototype.$notify({
            title: 'Success',
            message: 'Cập nhật thành viên thành công',
            type: 'success',
        })

        removeLoader();

        setTimeout(() => {
            window.location.href = '/admin/user1s/list'
        }, 2000);
    })
}


export const deleteUsers = ({ commit }, payload) => {

    displayLoader('Đang xóa thành viên');

    axios.delete(`/admin/user1s/destroy/${payload.id}`).then(res => {
        Vue.prototype.$notify({
            title: 'Success',
            message: res.data.message,
            type: 'success',
        })

        removeLoader();

    })
}