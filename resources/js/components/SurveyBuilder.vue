<template>
    <div class="container">
        <survey-progress-bar
            :current-step="currentStep"
            :steps="steps"
        />
        <div class="container my-4">
            <div class="accordion-area" role="tablist">
                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible1 ? null : 'collapsed'"
                            :aria-expanded="visible1 ? 'true' : 'false'"
                            @click="currentStep = 1"
                        >
                            Step 1: {{ steps[0].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-1" accordion="accordion" role="tabpanel" v-model="visible1">
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
                                        <img :src="'/storage/'+theme.logo">
                                    </label>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" v-on:click="currentStep=2">
                                    Next
                                </button>
                            </div>
                        </div>
                    </b-collapse>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible2 ? null : 'collapsed'"
                            :aria-expanded="visible2 ? 'true' : 'false'"
                            @click="currentStep = 2"
                        >
                            Step 2: {{ steps[1].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-2" accordion="accordion" role="tabpanel" v-model="visible2">
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
                                            :src="'/img/full_core.webp'"
                                            v-b-tooltip.hover title="Full Core">
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
                                            :src="'/img/reduced_core.png'"
                                            v-b-tooltip.hover title="Reduced Core"
                                        >
                                    </label>
                                </div>


                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" v-on:click="currentStep=3">
                                    Next
                                </button>
                            </div>
                        </div>
                    </b-collapse>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible3 ? null : 'collapsed'"
                            :aria-expanded="visible3 ? 'true' : 'false'"
                            @click="currentStep = 3"
                        >
                            Step 3: {{ steps[2].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-3" accordion="accordion" role="tabpanel" v-model="visible3">
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
                                            <img :src="'/storage/'+mod.logo">
                                        </label>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour" v-on:click="currentStep=4">
                                    Next
                                </button>
                            </div>
                        </div>
                    </b-collapse>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible4 ? null : 'collapsed'"
                            :aria-expanded="visible4 ? 'true' : 'false'"
                            @click="currentStep = 4"
                        >
                            Step 4: {{ steps[3].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-4" accordion="accordion" role="tabpanel" v-model="visible4">
                        <div class="py-4 mx-4">
                            <h3>Preview and finish</h3>
                            <p class="mt-3"></p>
                            <h4>Themes</h4>
                            <div class="row py-4 mx-4 justify-content-center">
                                <div v-for="theme in themes" :key="theme.id">
                                    <div v-if="selectedThemes.includes(theme.id)"
                                        class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                    >
                                        <img :src="'/storage/'+theme.logo">
                                    </div>

                                </div>
                            </div>

                            <h4>Core</h4>
                            <div class="row py-4 mx-4 justify-content-center">

                                <div v-if="selectedCore==true"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <img
                                        :src="'/img/full_core.webp'"
                                    >
                                </div>
                                <div v-if="selectedCore==false"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <img
                                        :src="'/img/reduced_core.png'"
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
                                    <b-spinner small v-if="busy" label="Spinning"></b-spinner>
                                    Finish
                                </button>
                            </div>
                        </div>
                    </b-collapse>
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
                busy: false,

            }
        },
       props: ['form'],

        computed: {
            // At some point, it'd be ideal to work out how to do this for any number of steps, perhaps using an array of 'visible' values instead of seperates...
            visible1: {
                get: function() {return this.currentStep === 1},
                set: function(newValue) { if(newValue) this.currentStep = 1 },
            },
            visible2: {
                get: function() {return this.currentStep === 2},
                set: function(newValue) { if(newValue) this.currentStep = 2 },
            },
            visible3: {
                get: function() {return this.currentStep === 3},
                set: function(newValue) { if(newValue) this.currentStep = 3 },
            },
            visible4: {
                get: function() {return this.currentStep === 4},
                set: function(newValue) { if(newValue) this.currentStep = 4 },
            },
        },

        mounted () {

            axios.get(rootUrl+'/api/themes').then((response) => {
                this.themes = response.data;

            })

            axios.get(rootUrl+'/api/modules').then((response) => {
                this.modules = response.data;
                if(this.form!=null){
                this.selectedThemes = this.form.themes.map((theme, index)=> {
                    return theme.id;
                });

                this.modulesFilter = this.modules.filter(module => this.selectedThemes.includes(module.theme_id));
                this.selectedModules = this.form.modules.map((module, index)=> {
                    return module.id;
                });

            }
            })

            if(this.currentStep == 4){
                    $('#collapseOne').collapse('hide');
                    $('#collapseFour').collapse('show');
                }

        },
        watch: {

            selectedThemes() {

                this.modulesFilter = this.modules.filter(module => this.selectedThemes.includes(module.theme_id));

            }
        },

        methods: {
            submit: function(event){
                this.busy = true;
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
                       this.busy = false;
                    }, (error) => {
                        this.busy = false;
                        console.log(error);
                    });
                }
            },
            update: function(event){
                this.busy = true;
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
                       this.busy = false;
                    }, (error) => {
                        this.busy = false;
                        console.log(error);
                    });
                }

            }
        }
    }


</script>
