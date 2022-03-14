<template>
  <div class="container">
    <!-- <el-card class="box-card"> -->
    <br />
    <div slot="header" class="clearfix">
      <el-page-header @back="goBack" :content="`Cập nhật thành viên`">
      </el-page-header>
    </div>
    <br />
    <div>
      <ValidationObserver ref="observer">
        <el-form
          :model="form"
          ref="khachhang-form"
          slot-scope="{ validate }"
          label-width="120px"
        >
          <el-row :guuter="10">
            <ValidationProvider rules="required|min:3" name="name">
              <el-form-item
                label="Tên"
                prop="name"
                slot-scope="{ errors }"
                :error="errors[0]"
              >
                <el-input
                  v-model="form.name"
                  aria-placeholder="Tên nhân viên"
                ></el-input>
              </el-form-item>
            </ValidationProvider>

            <ValidationProvider rules="required|email" name="email">
              <el-form-item
                label="Email"
                prop="email"
                slot-scope="{ errors }"
                :error="errors[0]"
              >
                <el-input
                  v-model="form.email"
                  aria-placeholder="Email"
                ></el-input>
              </el-form-item>
            </ValidationProvider>

            <ValidationProvider rules="required" name="password" vid="password">
              <el-form-item
                label="Mật khẩu"
                prop="password"
                slot-scope="{ errors }"
                :error="errors[0]"
              >
                <el-input
                  type="password"
                  v-model="form.password"
                  aria-placeholder="Mật khẩu"
                ></el-input>
              </el-form-item>
            </ValidationProvider>

            <ValidationProvider rules="required" name="role">
              <el-form-item
                label="Vai trò"
                prop="role"
                slot-scope="{ errors }"
                :error="errors[0]"
              >
                <el-radio-group v-model="form.role">
                  <el-radio :label="1">Quản trị</el-radio>
                  <el-radio :label="0">Thành viên</el-radio>
                </el-radio-group>
              </el-form-item>
            </ValidationProvider>

            <ValidationProvider rules="required" name="role">
              <el-form-item
                label="Trạng thái"
                prop="status"
                slot-scope="{ errors }"
                :error="errors[0]"
              >
                <el-radio-group v-model="form.status">
                  <el-radio :label="1">Có</el-radio>
                  <el-radio :label="0">Không</el-radio>
                </el-radio-group>
              </el-form-item>
            </ValidationProvider>
          </el-row>

          <el-row :guuter="10">
            <el-form-item>
              <el-button
                type="success"
                @click="
                  validate();
                  saveForm('khachhang-form');
                "
                >Cập nhật thành viên</el-button
              >
            </el-form-item>
          </el-row>
        </el-form>
      </ValidationObserver>
    </div>
    <!-- </el-card> -->
  </div>
</template>
<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";

export default {
  name: "khachhang-form",
  components: {
    ValidationObserver,
    ValidationProvider,
  },

  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    if (this.scope == "edit") {
      axios.get(`/admin/user1s/getuserbyid/${this.id}`).then((res) => {
        this.$set(this, "form", res.data.data);
      });
    }
  },
  data() {
    return {
      role: 1,
      form: {
        name: null,
        email: null,
        password: null,
        role: null,
        status: null,
        confirmation: null,
      },
    };
  },
  methods: {
    goBack() {
      window.location.href = "/admin/user1s/list";
    },

    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          if (this.scope == "create") {
            this.$store.dispatch("saveUser", this.form);
          } else {
            this.$store.dispatch("updateUsers", {
              id: this.id,
              form: this.form,
            });
          }
        }
      });
    },

    // save123() {
    //   if (!validate()) {
    //     saveForm("khachhang-form");
    //   }
    // },
  },
};
</script>