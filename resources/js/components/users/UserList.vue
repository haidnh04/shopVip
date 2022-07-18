<template>
  <div class="container">
    <br />
    <div slot="header" class="clearfix" style="margin-bottom: 10px">
      Danh sách thành viên
      <a href="/admin/user1s/add">
        <vs-button type="success" class="float-right"
          >Thêm thành viên</vs-button
        >
      </a>
    </div>

    <vs-table>
      <template #thead>
        <vs-tr>
          <vs-th> Tên </vs-th>
          <vs-th> Email </vs-th>
          <vs-th> Trạng thái </vs-th>
          <vs-th> Vai trò </vs-th>
          <vs-th> Ngày tạo </vs-th>
          <vs-th> Cập nhật </vs-th>
          <vs-th> </vs-th>
          <vs-th> </vs-th>
        </vs-tr>
      </template>
      <template #tbody>
        <vs-tr :key="user.id" v-for="user in users">
          <vs-td>
            {{ user.name }}
          </vs-td>

          <vs-td>
            {{ user.email }}
          </vs-td>
          <vs-td>
            {{ user.status }}
          </vs-td>
          <vs-td>
            {{ user.role }}
          </vs-td>

          <vs-td>
            {{ user.created_at }}
          </vs-td>

          <vs-td>
            {{ user.updated_at }}
          </vs-td>
          <!-- <template slot-scope="scope"> -->
          <vs-td>
            <vs-button @click="editUsers(user.id)" style="margin-bottom: 10px">
              Sửa
            </vs-button> </vs-td
          ><vs-td>
            <vs-button size="mini" type="danger" @click="deleteUsers(user.id)">
              Xóa
            </vs-button>
          </vs-td>
          <!-- </template> -->
        </vs-tr>
      </template>
    </vs-table>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "employee-form",

  data() {
    return {
      users: [],
    };
  },
  methods: {
    async getUserList() {
      let response = await axios.get("/admin/user1s/getUsers");
      this.users = response.data;
      // console.log(this.items);
    },

    async editUsers(id) {
      let response = await axios.get(`/admin/user1s/edit/${id}`);
      this.users = response.data;
      // console.log(this.items);
    },

    async deleteUsers(id) {
      let response = await axios
        .delete(`/admin/user1s/destroy/${id}`)
        .then((response) => {
          let i = this.users.map((data) => data.id).indexOf(id);
          this.users.splice(i, 1);
        });
    },
  },

  created: function () {
    this.getUserList();
  },
};
</script>

<style>
.float-right {
  float: right;
}
</style>