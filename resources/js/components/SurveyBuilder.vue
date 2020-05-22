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
                                            :src="'storage/'+theme.logo"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseTwo"
                                    aria-expanded="true" aria-controls="collapseTwo"  v-on:click="nextToForm('themes')">
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
                                            :src="'img/hh_demographics.png'"
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
                                            :src="'img/noun_survey.png'"
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
                                    v-for="mod in modules"
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
                                    <div class="card">
                                        
                                        <label
                                            class="checkdiv"
                                            :for="`${mod.id}_check`"
                                            :class="{ 'selected' : selectedModules.includes(mod.id)}"
                                        >
                                            <img
                                                :src="'storage/'+mod.logo"
                                            >
                                        </label>
                                        <h5>Description: {{mod.description}}</h5>
                                        <h5>Time: {{mod.minutes}} min</h5>
                                        <h5>Language: {{mod.minutes}} </h5>
                                        <h5>Sdgs: {{mod.minutes}} </h5>
                                        
                                    </div>
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
                                            :src="'storage/'+theme.logo"
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
                                        :src="'img/hh_demographics.png'"
                                    >
                                </div>
                                <div v-if="selectedCore==false"
                                    class="col-xl-2 col-lg-3 col-md-4 big-img-button"
                                >
                                    <img
                                        :src="'img/noun_survey.png'"
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
                                    <div class="card">
                                        <img
                                            :src="'storage/'+mod.logo"
                                        >
                                        <h5>Description: {{mod.description}}</h5>
                                        <h5>Time: {{mod.minutes}} min</h5>
                                        <h5>Language: {{mod.minutes}} </h5>
                                        <h5>Sdgs: {{mod.minutes}} </h5>
                                    </div>
                                </div>
                            </div>  
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="" href=""
                                    aria-expanded="false" aria-controls="" v-on:click='submit'>
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
                currentStep: 1,
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
                selectedThemes: [],
                selectedCore:'',
                selectedModules:[],
            }
        },

        mounted () {

            axios.get('api/themes').then((response) => {
                this.themes = response.data;
            }),

            axios.get('api/modules').then((response) => {
                this.modules = response.data;
                console.log(this.modules);
            })
        },

        methods: {
            nextToForm: function (message) {
                if(message=='themes') {
                    this.currentStep = 2;
                } else if(message=='core') {
                    this.currentStep = 3;
                } else if(message=='modules') {
                    this.currentStep = 4;
                }
            },
            submit: function(event){
                axios({
                    method: 'post',
                    url: rootUrl+"/survey-builder-selected",
                    data: {
                        selectedThemes: this.selectedThemes,
                        selectedCore: this.selectedCore,
                        selectedModules: this.selectedModules,
                    }
                });

            }
        }
    }
</script>
