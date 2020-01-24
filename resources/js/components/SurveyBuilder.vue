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
                                            :src="theme.logo"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
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
            }
        },

        mounted () {

            axios.get('api/themes').then((response) => {
                this.themes = response.data;
            })
        }
    }
</script>
