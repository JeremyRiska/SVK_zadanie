<template>
    <div class="container">
        <div class="row justify-content-center pt-5 pb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Country</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Country code</label>
                            <input class="form-control" type="text" placeholder="Default input" v-model="code" aria-label="default input example">
                            <div v-if="errors.code">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.code }} 
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" placeholder="Default input" v-model="name" aria-label="default input example">
                            <div v-if="errors.name">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.name }} 
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full name</label>
                            <input class="form-control" type="text" placeholder="Default input" v-model="full_name" aria-label="default input example">
                            <div v-if="errors.full_name">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.full_name }} 
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISO 3</label>
                            <input class="form-control" type="text" placeholder="Default input" v-model="iso3" aria-label="default input example">
                            <div v-if="errors.iso3">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.iso3 }} 
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number (ISO 3)</label>
                            <input class="form-control" type="text" placeholder="Default input" v-model="number" aria-label="default input example">
                            <div v-if="errors.number">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.number }} 
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Continent</label>
                            <select class="form-select" aria-label="Default select example" v-model="continent_code">
                                <option  v-for="continent in continents" :key="continent.code" :value="continent.code"> {{ continent.name }} </option>
                            </select>
                            <div v-if="errors.continent_code">
                                <p style="color: red; float: left; font-size: 12px; padding-left: 5px;"> 
                                    {{ errors.continent_code }} 
                                </p>
                            </div>
                        </div>
                        <button type="submit" @click="submitForm" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'AddCountry',
        data () {
            return {
                continents: [],
                code: '',
                name: '',
                full_name: '',
                iso3: '',
                number: '',
                continent_code: '',
                errors: {}
            };
        },
        mounted() {
            console.log('Component mounted.');
        },
        created() {
            axios.get('/api/get-continents').then(response => {
                this.continents = response.data
            })
        },
        methods: {
            submitForm() {
                let newCountry = {
                    code: this.code,
                    name: this.name,
                    full_name: this.full_name,
                    iso3: this.iso3,
                    number: this.number,
                    continent_code: this.continent_code
                }
                axios.post('/api/save-country', newCountry).then(response => {
                    this.$toast.success('New city ' + response.data.name + ' has been added');
                    this.$router.push('/spa/home');
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                })
            }
        }
    }
</script>