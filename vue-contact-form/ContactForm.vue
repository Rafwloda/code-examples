<template>
  <form class="form" v-on:submit="checkForm">
    <div class="form__group field">
      <input
        type="text"
        class="form__field"
        placeholder="Name"
        name="name"
        id="name"
        v-model="name"
      />
      <label for="name" class="form__label">Name</label>
    </div>
    <div class="form__group field">
      <input
        type="text"
        class="form__field"
        placeholder="E-mail"
        name="email"
        id="email"
        v-model="email"
      />
      <label for="name" class="form__label">E-mail</label>
    </div>
    <div class="form__group field">
      <input
        type="text"
        class="form__field"
        placeholder="Phone"
        name="phone"
        id="phone"
        v-model="phone"
      />
      <label for="name" class="form__label">Phone</label>
    </div>
    <div class="form__group field">
      <textarea
        type="text"
        class="form__field"
        placeholder="Message"
        name="message"
        id="message"
        v-model="message"
      ></textarea>
      <label for="name" class="form__label">Message</label>
    </div>
    <div class="form-group form-group__terms">
      <input type="checkbox" id="terms" v-model="check" />
      <label for="terms"
        >I accept the
        <nuxt-link to="privacy-policy">privacy policy.</nuxt-link></label
      >
    </div>
    <div class="form__message" v-if="success">
      Your message has been sent. Thank you!
    </div>
    <ul class="errors" v-if="errors">
      <li v-for="error in errors">{{ error }}</li>
    </ul>
    <div class="form__flex">
      <button type="submit" class="button button--on-white">
        <div></div>
        <span>{{ btn }}</span>
        <svg
          width="19"
          height="16"
          viewBox="0 0 19 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M18.7071 8.70711C19.0976 8.31658 19.0976 7.68342 18.7071 7.29289L12.3431 0.928931C11.9526 0.538407 11.3195 0.538407 10.9289 0.928931C10.5384 1.31946 10.5384 1.95262 10.9289 2.34314L16.5858 8L10.9289 13.6569C10.5384 14.0474 10.5384 14.6805 10.9289 15.0711C11.3195 15.4616 11.9526 15.4616 12.3431 15.0711L18.7071 8.70711ZM8.74228e-08 9L18 9L18 7L-8.74228e-08 7L8.74228e-08 9Z"
            fill="#1B1818"
          />
        </svg>
      </button>

      <div class="lds-ring" v-if="loading">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </form>
</template>

<script>
import Button from "~/components/atoms/Button.vue";

export default {
  data() {
    return {
      name: "",
      email: "",
      phone: "",
      message: "",
      btn: "Send",
      loading: false,
      check: false,
      errors: [],
      success: false,
    };
  },
  components: {
    Button,
  },
  methods: {
    validateEmail(email) {
      return String(email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    },
    checkForm(e) {
      e.preventDefault();
      this.errors = [];

      if (!this.check) {
        this.errors.push("You need to accept the privacy policy.");
      }

      if (this.name.length < 3) {
        this.errors.push("Name is required.");
      }

      if (this.name.length > 20) {
        this.errors.push("Your name is too long.");
      }

      if (!this.email) {
        this.errors.push("Email is required.");
      }

      if (this.email && !this.validateEmail(this.email)) {
        this.errors.push("Invalid email.");
      }

      if (this.message.length < 3) {
        this.errors.push("Your message is too short.");
      }

      if (this.message.length > 200) {
        this.errors.push("Your message is too long.");
      }

      if (this.errors.length > 0) {
        return;
      } else {
        this.btn = "Sending";
        this.loading = true;

        fetch("**API URL**", {
          method: "POST",
          headers: {
            Accept: "application/json, text/plain, */*",
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            to: '**CLIENT EMAIL**', // email odbiorcy
            subject: "Wiadomość z formularza kontaktowego", // temat wiadomości
            text: `Imię: ${this.name}\nTelefon: ${this.phone}\nEmail: ${this.email}\nWiadomość: ${this.message}`, // wiadomość w formacie tekstowym
            html: `<p>Imię: ${this.name}</p><p>Telefon: ${this.phone}</p><p>Email: ${this.email}</p><p>Wiadomość: ${this.message}</p>`, // wiadomość w formacie HTML
          }),
        }).then((res) => {
          console.log(res);
          this.success = true;
          this.btn = "Send";
          this.name = "";
          this.email = "";
          this.message = "";
          this.phone = "";
          this.check = false;
          this.loading = false;
        });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
@import "@/assets/scss/variables.scss";
@import "@/assets/scss/breakpoints.scss";
@import "@/assets/scss/global.scss";
@import "@/assets/scss/mixins.scss";

.button {
  background-color: $black;
  padding: 100px 0;
  display: flex;
  align-items: center;
  cursor: pointer;
  &--on-white {
    @include primary-button-on-white;
  }
  svg {
    path {
      transition: 0.3s ease;
    }
  }
}

.errors {
  li {
    padding-left: 0;
    color: #d63333;
    &:last-child {
      margin-bottom: 17px;
    }
    &::before {
      content: none;
    }
  }
}
.form {
  max-width: 456px;
  font-weight: 500;
  &__btn {
    max-width: 235px;
    margin-bottom: 100px;
  }
  &__flex {
    display: flex;
    align-items: center;
  }
  &__message {
    background-color: #fafafa;
    padding: 20px 30px;
    margin-bottom: 20px;
    color: #4da53a;
  }
}

.form-group {
  display: block;
  margin-bottom: 15px;
  input {
    padding: 0;
    height: initial;
    width: initial;
    margin-bottom: 0;
    display: none;
    cursor: pointer;
    &:checked + label:after {
      content: "";
      display: block;
      position: absolute;
      // top: 2px;
      top: 50%;
      left: 9px;
      width: 6px;
      height: 14px;
      border: solid $dark-gray;
      border-width: 0 2px 2px 0;
      transform: translateY(-50%) rotate(45deg);
    }
  }
  label {
    position: relative;
    cursor: pointer;
    &:before {
      content: "";
      -webkit-appearance: none;
      background-color: transparent;
      border: 1px solid $dove;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
        inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
      padding: 10px;
      display: inline-block;
      position: relative;
      vertical-align: middle;
      cursor: pointer;
      margin-right: 5px;
    }
  }
  &__terms {
    margin: 15px 0 20px 0;
    a {
      color: $dark-gray;
    }
  }
}
.form__group {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  width: 100%;
  textarea {
    resize: none;
  }
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 1px solid $dove;
  outline: 0;
  font-size: 1.6rem;
  color: $black;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;

  &::placeholder {
    color: transparent;
  }

  &:placeholder-shown ~ .form__label {
    font-size: 1.6rem;
    cursor: text;
    top: 20px;
  }
}

.form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: $dark-gray;
}

.form__field:focus {
  ~ .form__label {
    position: absolute;
    top: 0;
    display: block;
    transition: 0.2s;
    font-size: 1rem;
    color: $dark-gray;
  }
  padding-bottom: 6px;
  border-width: 1px;
  border-image: $dark-gray;
  border-image-slice: 1;
  font-weight: 500;
}
/* reset input */
.form__field {
  &:required,
  &:invalid {
    box-shadow: none;
  }
}

.lds-ring {
  display: inline-block;
  position: relative;
  width: 42px;
  height: 42px;
  margin-left: 20px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 32px;
  height: 32px;
  margin: 5px;
  border: 4px solid $dark-gray;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: $dark-gray transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
