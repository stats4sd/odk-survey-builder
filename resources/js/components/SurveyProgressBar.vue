<template>
    <div class="row form-prog justify-content-center">
        <div class="col-10 h-100">
            <div class="container pbcont d-none d-sm-block">
                <ul class="progressbar">
                    <li
                        v-for="step in steps"
                        :key="step.id"
                        :class="{
                            'pb_done' : currentStep > step.id,
                            'pb_active' : currentStep == step.id
                        }"
                    >
                        <h3>Step {{ step.id }}</h3>
                        {{ step.title }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: {
            currentStep: {
                type: Number,
                default: 1,
            }
        },

        data () {
            return {
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
                ]
            }
        }

    }
</script>