<template>
  <a :class="{ active: isActive }" @click="go" href="#">
    <slot></slot>
  </a>
</template>

<script>
  export default {
    props: {
      href: {
        type: String,
        required: this.hrefName != "" ? false: true
      },
      hrefName: {
        type: String,
        required: this.href != "" ? false: true,
      },
      param: {
        type: Object,
        default: () =>{
        }
      }
    },
    computed: {
      isActive (){
        return this.href === this.$root.currentRoute
      }
    },
    methods: {
      go (event){
        event.preventDefault()
        // this.$root.currentRoute = this.href
        let param = this.param;

        this.$router.push({
          name: this.hrefName,
          params: param
        })
      }
    }
  }
</script>
