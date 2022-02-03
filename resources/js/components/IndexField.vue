<template>
  <p>
    <img
      v-if="field.previewUrl"
      :src="field.previewUrl"
      :alt="field.helpText"
      style="object-fit: cover"
      class="align-bottom rounded w-9 h-9"
    />
    <span v-else>&mdash;</span>
  </p>
</template>

<script>
export default {
  props: [
    'resourceName',
    'field',
  ],
}
</script>
