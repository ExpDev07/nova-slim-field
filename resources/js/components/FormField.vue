<template>
  <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
    <template slot="field">
      <div :id="fieldId" class="slim">
        <img
          v-if="imageUrl"
          :src="imageUrl"
          :alt="field.helpText"
        />
        <input ref="field" type="file" name="slim[]" />
      </div>
    </template>
  </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';

export default {
  mixins: [
    FormField,
    HandlesValidationErrors
  ],
  props: [
    'resourceName',
    'resourceId',
    'field',
  ],
  computed: {
    fieldId() {
      return 'slim_' + this.field['sortableUriKey'];
    },
    imageUrl() {
      return this.field.value ? this.field.previewUrl : null;
    },
  },
  data: () => ({
    image: null,
    imageName: '',
    imageRemoved: false,
  }),
  methods: {
    /**
     * Fills the form data with properties.
     */
    fill(formData) {
      if (this.image) {
        formData.append(this.field.attribute, this.image, this.imageName);
      }
    },
    /**
     * Converts a data URL to a file object.
     */
    async dataUrlToFile(dataUrl, fileName, type) {
      const res = await fetch(dataUrl);
      const blob = await res.blob();

      return new File([blob], fileName, { type });
    }
  },
  /**
   * Called when the component mounts.
   */
  mounted() {
    $('#' + this.fieldId).slim({

      edit: this.field.cropable,
      ratio: this.field.ratio || undefined,
      size: this.field.size || undefined,

      didSave: async ({ output }) => {
        // Update status.
        this.image = await this.dataUrlToFile(output.image, output.name, output.type);
        this.imageName = output.name;
        this.imageRemoved = false;
      },

      didRemove: async () => {
        // Delete file.
        await Nova.request().delete(`/nova-api/${this.resourceName}/${this.resourceId}/field/${this.field.attribute}`);
        this.$emit('file-deleted');

        // Update status.
        this.image = null;
        this.imageName = '';
        this.imageRemoved = true;
      },

    });
  },
}
</script>

<style scoped>
.slim[data-state="empty"] {
  max-height: 250px;
  height: 100%;
}
</style>
