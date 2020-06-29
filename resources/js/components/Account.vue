<template>
   
    <div>
    <!-- <div class="panel-link active collapsed" style="background-color: #12756b; color: white; min-height:70px; border-radius:13px; text-align: left; position: relative; padding: 17px 65px 17px 20px; font-size: 15px; font-weight: 500;">Created Forms</div> -->

    <div class="mt-3">
        <b-table sticky-header :items="forms" :fields="fields" head-variant="dark">
        <template v-slot:cell(actions)="row">

        <div style=" display: flex;">
            <button @click="row.toggleDetails" style="background: #f46036; width: 150px;">
              {{ row.detailsShowing ? 'Hide' : 'Show'}} Details
            </button>
            <button @click="edit(row.item.id)" class="mx-2" style="background: #f46036; width: 150px;">
                Edit
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

      <template v-slot:row-details="row">
        <b-card>
          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>Themes:</b></b-col>
            <b-col>{{ row.item.form_id }}</b-col>
          </b-row>

          <b-row class="mb-2">
            <b-col sm="3" class="text-sm-right"><b>Modules:</b></b-col>
            <b-col>{{ row.item.isActive }}</b-col>
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
            }
        },
        props: ['forms'],
        methods: {
          openOdkBuilder: function() {
            location.href='/odk-builder';
          },

          edit: function (id) {
            location.href= '/odk-builder/' + id + '/edit';
          }
        }
        
    }
</script>
