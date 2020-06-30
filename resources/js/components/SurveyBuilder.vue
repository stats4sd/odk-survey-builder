<template>
    <div class="container">
        <survey-progress-bar
            :current-step="currentStep"
            :steps="steps"
        />
        <div
            id="survey-sections"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                        >
                            Step 1: {{ steps[0].title }}
                        </button>
                    </div>
                    <div
                        id="collapseOne"
                        class="collapse show"
                        data-parent="#survey-sections"
                    >
                        <div class="py-4 mx-4">
                            <h3>What themes are you interested in collecting data about?</h3>
                            <p class="mt-3">Selection options below to begin</p>
                            <div class="row img-block py-4 mx-4 justify-content-center">
                                <div
                                    v-for="theme in themes"
                                    :key="theme.id"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <input
                                        :id="`${theme.id}_check`"
                                        v-model="selectedThemes"
                                        type="checkbox"
                                        :value="theme.id"
                                        class="d-none"
                                    >
                                    <label
                                        class="checkdiv"
                                        :for="`${theme.id}_check`"
                                        :class="{ 'selected' : selectedThemes.includes(theme.id)}"
                                    >
                                        <img
                                            :src="'/storage/'+theme.logo"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo"  v-on:click="nextToForm('themes')">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-core"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active collapsed"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                        >
                            Step 2: {{ steps[1].title }}
                        </button>
                    </div>
                    <div
                        id="collapseTwo"
                        class="collapse"
                        data-parent="#survey-core"
                    >
                        <div class="py-4 mx-4">
                            <h3>Do you want full Core or Reduced Core Rhomis?</h3>
                            <p class="mt-3">Selection options below to begin</p>
                            <div class="row img-block py-4 mx-4 justify-content-center">
                                        
                                <div class="col-xl-2 col-lg-3 col-md-4 big-img-button">

                                    <input
                                        :id="`full_core_check`"
                                        v-model="selectedCore"
                                        type="checkbox"
                                        :value="true"
                                        class="d-none"
                                    >
                                    <label
                                        class="checkdiv"
                                        :for="`full_core_check`"
                                        :class="{ 'selected' : selectedCore == true}"
                                    >
                                        <img
                                            :src="'/storage/core.webp'"
                                        >

                                    </label>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 big-img-button">
                                    <input
                                        :id="`reduced_core_check`"
                                        v-model="selectedCore"
                                        type="checkbox"
                                        :value="false"
                                        class="d-none"
                                    >
                                    <label
                                        class="checkdiv"
                                        :for="`reduced_core_check`"
                                        :class="{ 'selected' : selectedCore == false}"
                                    >
                                        <img
                                            :src="'/storage/other_modules.jpg'"
                                        >
                                    </label>
                                </div>
                              
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('core')">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-modules"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active collapsed"
                            data-toggle="collapse"
                            data-target="#collapseThree"
                        >
                            Step 3: {{ steps[2].title }}
                        </button>
                    </div>
                    <div
                        id="collapseThree"
                        class="collapse"
                        data-parent="#survey-modules"
                    >
                        <div class="py-4 mx-4">
                            <h3>Add optional modules</h3>
                            <p class="mt-3">Selection options below to begin</p>
                            <div class="row py-4 mx-4 justify-content-center">
                                <div
                                    v-for="mod in modulesFilter"
                                    :key="mod.id"
                                    class="col-md-4"
                                >
                                
                                    <input
                                        :id="`${mod.id}_check`"
                                        v-model="selectedModules"
                                        type="checkbox"
                                        :value="mod.id"
                                        class="d-none"
                                    >
                                  
                                        <label
                                            class="checkdiv"
                                            :for="`${mod.id}_check`"
                                            :class="{ 'selected' : selectedModules.includes(mod.id)}"
                                        >
                                            <img
                                                :src="'/storage/'+mod.logo"
                                            >
                                        </label>
                                       
                                
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour" v-on:click="nextToForm('modules')">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-review"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active collapsed"
                            data-toggle="collapse"
                            data-target="#collapseFour"
                        >
                            Step 4: {{ steps[3].title }}
                        </button>
                    </div>
                    <div
                        id="collapseFour"
                        class="collapse"
                        data-parent="#survey-review"
                    >
                        <div class="py-4 mx-4">
                            <h3>Preview and finish</h3>
                            <p class="mt-3"></p>
                            <h4>Themes</h4>
                            <div class="row py-4 mx-4 justify-content-center">
                                <div
                                    v-for="theme in themes"
                                    :key="theme.id" 
                                >
                                    <div v-if="selectedThemes.includes(theme.id)"
                                        class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                    >
                                        <img
                                            :src="'/storage/'+theme.logo"
                                        >
                                    </div>
                                    
                                </div>
                            </div>

                            <h4>Core</h4>
                            <div class="row py-4 mx-4 justify-content-center">
                                
                                <div v-if="selectedCore==true"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <img
                                        :src="'/storage/core.webp'"
                                    >
                                </div>
                                <div v-if="selectedCore==false"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <img
                                        :src="'/storage/other_modules.jpg'"
                                    >
                                </div>
                            </div>

                            <h4>Modules</h4>
                            <div class="row py-4 mx-4 justify-content-center">
                                <div
                                    v-for="mod in modules"
                                    :key="mod.id" 
                                >
                                    <div v-if="selectedModules.includes(mod.id)"
                                        class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                    >
                                        <img
                                            :src="'/storage/'+mod.logo"
                                        >
                                       
                             
                                    </div>
                                </div>  
                            </div>
                            <h4>Settings</h4>
                            <div class="row py-4 mx-4 justify-content-center">
                      
                                <div class="col-md-4">
                                    <h5>Form Title</h5>
                                    <input v-model="formTitle" placeholder="Insert the title">
                                </div>

                                <div class="col-md-4">
                                    <h5>Form Id</h5>
                                    <input v-model="formId" placeholder="Insert the id">
                                </div>

                                 <div class="col-md-4">
                                    <h5>Default Language</h5>
                                    <input v-model="defaultLanguage" placeholder="Insert the default language">
                                </div>
                            </div>

                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="" href=""
                                    aria-expanded="false" aria-controls="" v-on:click='submit(); update(); '>
                                    Finish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

const rootUrl = process.env.MIX_APP_URL

    export default {
        data () {
            return {
                currentStep: this.form ? 4 : 1,
                steps: [
                    {
                        'id': 1,
                        'title': "Information Needs / Themes",
                    },
                    {
                        'id': 2,
                        'title': "Rhomis Core Setup",
                    },
                    {
                        'id': 3,
                        'title': "Modules",
                    },
                    {
                        'id': 4,
                        'title': "Preview and Finish",
                    },
                ],
                themes: [],
                modules: [],
                modulesFilter: [],
                selectedThemes: [],
                selectedCore: this.form ? this.form.full_core : true,
                selectedModules:[],
                formTitle: this.form ? this.form.form_title : '',
                formId: this.form ? this.form.form_id : [],
                defaultLanguage: this.form ? this.form.default_language : [],

            }
        },
       props: ['form'],

        mounted () {

            axios.get(rootUrl+'/api/themes').then((response) => {
                this.themes = response.data;

            })

            axios.get(rootUrl+'/api/modules').then((response) => {
                this.modules = response.data;
            })

            if(this.currentStep == 4){
                    $('#collapseOne').collapse('hide');
                    $('#collapseFour').collapse('show');
                }

            if(this.form!=null){ 
                this.selectedThemes = this.form.themes.map((theme, index)=> {
                    return theme.id;
                });

                this.selectedModules = this.form.modules.map((module, index)=> {
                    return module.id;
                });

                this.modulesFilter = this.modules.filter(module => this.selectedThemes.includes(module.theme_id));

            }
            
        },
        watch: {
          
            selectedThemes() {
       
                this.modulesFilter = this.modules.filter(module => this.selectedThemes.includes(module.theme_id));

            }
        },

        methods: {
            nextToForm: function (message) {
                if(message=='themes') {
                    this.currentStep = 2;
                    $('#collapseOne').collapse('hide');
                } else if(message=='core') {
                    this.currentStep = 3;
                    $('#collapseTwo').collapse('hide');
                } else if(message=='modules') {
                    this.currentStep = 4;
                    $('#collapseThree').collapse('hide');
                }
            },
         
            submit: function(event){
                if(this.form == null){
                    axios({
                        method: 'post',
                        url: rootUrl+"/survey-builder-selected",
                        data: {
                            selectedThemes: this.selectedThemes,
                            selectedCore: this.selectedCore,
                            selectedModules: this.selectedModules,
                            formTitle: this.formTitle,
                            formId: this.formId,
                            defaultLanguage: this.defaultLanguage,
                        }
                    })
                    .then((result) => {
                       window.location.href = result.data['path'];
                    }, (error) => {
                        console.log(error);
                    });
                }                   
            }, 
            update: function(event){
                if(this.form != null){
                    axios({
                        method: 'post',
                        url: rootUrl + "/edit-form/" + this.form.id,
                        data: {
                            selectedThemes: this.selectedThemes,
                            selectedCore: this.selectedCore,
                            selectedModules: this.selectedModules,
                            formTitle: this.formTitle,
                            formId: this.formId,
                            defaultLanguage: this.defaultLanguage,
                        }
                    })
                    .then((result) => {
                       window.location.href = result.data['path'];
                    }, (error) => {
                        console.log(error);
                    });  
                }                 

            }
        }
    }


</script>
