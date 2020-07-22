<template>
   
    <div>
    <b-alert v-if="message" variant="success" show> {{message}} </b-alert>
    <div class="mt-3">
        <b-table sticky-header="600px" :items="forms" :fields="fields" head-variant="dark">
        <template v-slot:cell(actions)="row">

        <div style=" display: flex;">
            <button @click="row.toggleDetails" style="background: #f46036; width: 150px;">
              {{ row.detailsShowing ? 'Hide' : 'Show'}} Details
            </button>
            <button @click="edit(row.item.id)" class="mx-2" style="background: #f46036; width: 150px;">
                Edit
            </button>
            <button @click="remove(row.item.id)" class="mx-2" style="background: #f46036; width: 150px;">
                Delete
            </button>
    </div>

      </template>
      <template v-slot:cell(full_core)="row">
        <b-form-checkbox
          :checked="row.item.full_core"
          :disabled="true"
    
        >
        </b-form-checkbox>

      </template>

      <template v-slot:cell(file)="row">
        <a :href="'/storage/odk_forms/' + row.item.file">{{row.item.file}}</a>

      </template>

      <template v-slot:row-details="row">
        <b-card>
          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>Themes:</b></b-col>

            <b-col><span v-for="theme in row.item.themes">{{ theme.title }}, </span></b-col>
          </b-row>

          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>Modules:</b></b-col>
            <b-col><span v-for="module in row.item.modules">{{ module.title }}, </span></b-col>
          </b-row>

        </b-card>
      </template>
        </b-table>
    </div>
    <button @click="openOdkBuilder" class="btn-secondary float-right" style=" width: 150px;">
                Create a New Form
    </button>
</div>
    
</template>

<script>
    export default {
        data() {
            return {
                fields: ['form_title', 'form_id', 'default_language', 'full_core', 'file', 'created_at', 'actions'],
                message:'',
            }
        },
        props: ['forms'],
        methods: {
          openOdkBuilder: function() {
            location.href='/odk-builder';
          },

          edit: function (id) {
            location.href= '/odk-builder/' + id + '/edit';
          },

          remove: function (id) {
            axios.post('/account/' + id + '/delete', {
              }).then((result) => {

                this.message = result.data.message;
                location.href= '/home';
              })
            }
          }
    }
</script>
