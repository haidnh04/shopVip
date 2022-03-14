<template>
  <div class="container">
    <!-- <el-card class="box-card"> -->
    <br />
    <div slot="header" class="clearfix" style="margin-bottom: 10px">
      Danh sách thành viên
      <a href="/admin/user1s/add">
        <el-button type="success" class="float-right"
          >Thêm thành viên</el-button
        >
      </a>
    </div>

    <div>
      <el-table
        :data="tableData"
        style="width: 100%"
        :border="true"
        :row-class-name="tableRowClassName"
        height="500"
        :header-row-style="{ textAlign: 'center' }"
      >
        <!-- <el-table-column
          v-for="column in tableColumns"
          :key="column.label"
          :label="column.label"
          :prop="column.prop"
          :column-key="column.prop"
          :minWith="column.minWith"
          :sortable="column.sortable"
          :align="column.align"
          :header-align="column.align"
        >
        </el-table-column> -->

        <el-table-column
          prop="name"
          label="Tên"
          header-align="center"
          @mouseover="mouseOver"
          align="center"
        >
        </el-table-column>

        <el-table-column
          prop="email"
          label="Email"
          header-align="center"
          align="center"
        >
        </el-table-column>

        <el-table-column
          prop="role"
          label="Vai trò"
          header-align="center"
          align="center"
          :filters="[
            { text: 1, value: 1 },
            { text: 0, value: 0 },
          ]"
          :filter-method="filterTag"
          filter-placement="bottom-end"
        >
          <template slot-scope="scope">
            <el-tag
              :type="scope.row.role === 1 ? 'primary' : 'success'"
              disable-transitions
              >{{ scope.row.role }}</el-tag
            >
          </template>
          >
        </el-table-column>

        <el-table-column
          prop="status"
          label="Trạng thái"
          header-align="center"
          align="center"
          :filters="[
            { text: 1, value: 1 },
            { text: 0, value: 0 },
          ]"
          :filter-method="filterTag"
          filter-placement="bottom-end"
        >
          <template slot-scope="scope">
            <el-tag
              :type="scope.row.status === 1 ? 'primary' : 'success'"
              disable-transitions
              >{{ scope.row.status }}</el-tag
            >
          </template>
        </el-table-column>

        <el-table-column
          prop="created_at"
          label="Ngày tạo"
          header-align="center"
          align="center"
        >
        </el-table-column>

        <el-table-column
          prop="updated_at"
          label="Cập nhật"
          header-align="center"
          align="center"
        >
        </el-table-column>

        <el-table-column align="right">
          <template slot="header" slot-scope="scope">
            <el-input v-model="search" size="mini" placeholder="Tìm kiếm...">
            </el-input>
          </template>

          <template slot-scope="scope">
            <el-button
              size="mini"
              type="success"
              @click="editUsers(scope.$index, scope.row)"
              style="margin-bottom: 10px"
            >
              Sửa
            </el-button>
            <br />
            <el-button
              size="mini"
              type="danger"
              @click="deleteUsers(scope.$index, scope.row)"
            >
              Xóa</el-button
            >
          </template>
        </el-table-column>
      </el-table>

      <template slot-scope="scope">
        <el-tag
          :type="scope.row.role === 1 ? 'primary' : 'success'"
          disable-transitions
          >{{ scope.row.role }}</el-tag
        >
      </template>

      <p v-show="active">đây rồi</p>
      <p @mouseover="mouseOver">show ra</p>

      <el-pagination
        layout="prev, pager, next"
        :total="this.tableData1.length"
        @current-change="setPage"
      >
      </el-pagination>
    </div>
    <!-- </el-card> -->
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  name: "employee-form",

  props: {
    scope: String,
    id: Number,
  },

  mounted() {
    const loading = this.$loading({
      lock: true,
      text: "loading...",
      spinner: "el-icon-loading",
      background: "rgba(255,255,255, 0.85)",
    });

    this.$store.dispatch("getUsers");
    loading.close();
  },

  computed: {
    tableData() {
      return this.tableData1.slice(
        this.pageSize * this.page - this.pageSize,
        this.pageSize * this.page
      );
    },

    ...mapGetters({ tableData: "tableData" }),
  },

  data() {
    return {
      tableData1: [],
      page: 1,
      pageSize: 4,

      search: null,

      form: {
        name: null,
        email: null,
        role: null,
        status: null,
        created_at: null,
        updated_at: null,
      },

      active: false,

      // tableColumns: [
      //   {
      //     prop: "name",
      //     label: "Name",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: true,
      //     align: "center",
      //     fix: true,
      //   },
      //   {
      //     prop: "email",
      //     label: "Email",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: false,
      //     align: "center",
      //     fix: true,
      //   },
      //   {
      //     prop: "role",
      //     label: "Vai trò",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: false,
      //     align: "center",
      //     fix: true,
      //     filterMethod: "filterTag",
      //   },
      //   {
      //     prop: "status",
      //     label: "Trạng thái",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: false,
      //     align: "center",
      //     fix: true,
      //   },
      //   {
      //     prop: "created_at",
      //     label: "Ngày tạo",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: false,
      //     align: "center",
      //     fix: true,
      //   },
      //   {
      //     prop: "updated_at",
      //     label: "Cập nhật",
      //     minWith: 100,
      //     hidden: true,
      //     sortable: false,
      //     align: "center",
      //     fix: true,
      //   },
      // ],
    };
  },
  methods: {
    editUsers(index, row) {
      window.location.href = "/admin/user1s/edit/" + row.id + "/edit";
    },

    deleteUsers(index, row) {
      this.$confirm("Bạn có chắc chắn xóa. Tiếp tục?", "Warning", {
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Không",
        type: "warning",
      })
        .then(() => {
          this.$store.dispatch("deleteUsers", {
            id: row.id,
          });

          this.$store.dispatch("getUsers");

          this.$message({
            type: "success",
            message: "Xóa thành công",
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Đã bỏ xóa",
          });
        });
    },

    tableRowClassName({ row, rowIndex }) {
      if (rowIndex % 2 == 0) {
        return "warning-row";
      } else {
        return "success-row";
      }
      return "";
    },

    filterTag(value, row) {
      return row.status === value;
    },

    setPage(val) {
      this.page = val;
    },

    mouseOver: function () {
      this.active = !this.active;
    },

    // timestampToTime(row, column) {
    //   var date = new date(row.updated_at); // if the timestamp is 10 bits, it needs * 1000; if the timestamp is 13 bits, it doesn't need to multiply 1000
    //   var Y = date.getFullYear() + "-";
    //   var M =
    //     (date.getMonth() + 1 < 10
    //       ? "0" + (date.getMonth() + 1)
    //       : date.getMonth() + 1) + "-";
    //   var D = date.getDate() + " ";
    //   var h = date.getHours() + ":";
    //   var m = date.getMinutes() + ":";
    //   var s = date.getSeconds();
    //   return Y + M + D + h + m + s;
    //   console.log(timestampToTime(1533293827000));
    // },
  },
};
</script>

<style>
.float-right {
  float: right;
}

.el-table .warning-row {
  background: oldlace;
}

.el-table .success-row {
  background: white;
}
</style>