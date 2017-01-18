<template>
  <div class="alert alert-dismissible" role="alert" v-bind:class='"alert--" + type'>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{message}}
  </div>
</template>

<script>
export default {
  name: 'alert',
  props: [
    'message',
    'type'
  ],
  data () {
    return {
    }
  }
}
</script>
