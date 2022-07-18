<template>
  <div class="container">
    <div class="centerx labelx">
      <br />
      <vs-input
        class="inputx"
        label="Tên"
        v-model="name"
        type="text"
        width="100%"
      >
        <template #icon> <i class="bx bx-user"></i> </template
      ></vs-input>
      <br />
      <vs-input label="Email" v-model="email" type="text" />
      <br />
      <vs-input label="Mật khẩu" v-model="password" type="password">
        <template #icon>
          <i class="bx bx-lock-open-alt"></i>
        </template>
      </vs-input>
      <br />
      <div>
        <vs-radio v-model="role" val="1"> Quản trị </vs-radio>
        <vs-radio v-model="role" val="0"> Thành viên </vs-radio>
      </div>
      <br />
      <div>
        <vs-radio v-model="status" val="1"> Có</vs-radio>
        <vs-radio v-model="status" val="0"> Không </vs-radio>
      </div>
      <br />
      <vs-button
        type="submit"
        class="btn btn-primary btn-submit-fix"
        v-on:click.prevent="getUserAddress()"
      >
        Thêm thành viên
      </vs-button>
    </div>
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
      status: 1,
      // form: {
      name: "",
      email: "",
      password: "",
      role: "",
      status: "",
      confirmation: "",
      // },
    };
  },
  methods: {
    goBack() {
      this.$router.push({ path: "/admin/user1s/list" });
    },

    async getUserAddress() {
      if (this.name != "" && this.email != "" && this.password != "") {
        // Process payment.
        let response = await axios.post("/admin/user1s/store", {
          name: this.name,
          email: this.email,
          password: this.password,
          role: this.role,
          status: this.status,
        });

        // if (response.data.success) {
        //   this.$toastr.s(response.data.success);
        // } else {
        //   this.$toastr.e(response.data.error);
        // }

        setTimeout(() => {
          this.$router.push({ path: "/admin/user1s/list" });
        }, 500);

        console.log(response.data);
      } else {
        // this.$toastr.e("Thông tin đơn hàng chưa hoàn thiện");
      }
    },
    // saveForm(formName) {
    //   this.$refs[formName].validate((valid) => {
    //     if (valid) {
    //       if (this.scope == "create") {
    //         this.$store.dispatch("saveUser", this.form);
    //       } else {
    //         this.$store.dispatch("updateUsers", {
    //           id: this.id,
    //           form: this.form,
    //         });
    //       }
    //     }
    //   });
    // },

    // save123() {
    //   if (!validate()) {
    //     saveForm("khachhang-form");
    //   }
    // },
  },
};
</script>

<style>
.vs-radio-label {
  font-size: 0.8rem;
}
.vs-radio-content {
  float: left;
}
.vs-input-label {
  font-size: 0.8rem;
  text-align: left;
}
.vs-input-content {
  margin: 10px 0px;
  width: calc(100%);
}
.vs-input {
  width: 100%;
}
</style>