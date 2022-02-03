<template>
  <panel-item :field="field">
    <template slot="value">
      <div class="w-1/2">
        <img
          v-if="field.previewUrl"
          :src="field.previewUrl"
          :alt="field.helpText"
          style="object-fit: cover;"
          class="align-bottom rounded"
        />
        <span v-else>&mdash;</span>
      </div>
    </template>
  </panel-item>
</template>

<script>
export default {
  props: [
    'resource',
    'resourceName',
    'resourceId',
    'field',
  ],
}
</script>
