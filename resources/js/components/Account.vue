<template>
   
    <div>
    <!-- <div class="panel-link active collapsed" style="background-color: #12756b; color: white; min-height:70px; border-radius:13px; text-align: left; position: relative; padding: 17px 65px 17px 20px; font-size: 15px; font-weight: 500;">Created Forms</div> -->

    <div class="mt-3">
        <b-table sticky-header :items="forms" head-variant="dark"></b-table>
    </div>
</div>

                
        
</template>

<script>
    export default {
        data() {
            return {
                forms:[]
            }
        },
        mounted () {

            axios.get('api/forms').then((response) => {
                this.forms = response.data;
                console.log(this.forms);

            })
        }
    }
</script>
