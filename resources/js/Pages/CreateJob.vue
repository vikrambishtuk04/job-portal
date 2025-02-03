<script setup>
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
// import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const form = useForm({
    title: '',
    description: '',
    experience: '',
    salary: '',
    location: '',
    extra_info: '',
    company_name: '',
    company_logo: null,
    skills: []
});

const submit = () => {
    form.post(route('admin.jobs.store'));
};
</script>

<template>
    <Head title="CreateJob" />
    <AuthenticatedLayout>
        <!-- Hero -->
        <!-- <Hero /> -->
    <div class="container py-4">
        <!-- <h2 class="mb-4">Create new job posting</h2> -->
        
        <form @submit.prevent="submit">
            <div class="row">
                <!-- Job Details Column -->
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Job details</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input 
                                    v-model="form.title"
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Job posting title"
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea 
                                    v-model="form.description"
                                    class="form-control" 
                                    rows="4" 
                                    placeholder="Job posting description"
                                ></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Experience</label>
                                    <input 
                                        v-model="form.experience"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Eg. 1-3 Yrs"
                                    >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Salary</label>
                                    <input 
                                        v-model="form.salary"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Eg. 2.75-5 Lacs PA"
                                    >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Location</label>
                                    <input 
                                        v-model="form.location"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Eg. Remote / Pune"
                                    >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Extra Info</label>
                                    <input 
                                        v-model="form.extra_info"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Eg. Full Time, Urgent / Part Time, Flexible"
                                    >
                                    <small class="text-muted">Please use comma separated values</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Details Column -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Company details</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input 
                                    v-model="form.company_name"
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Company Name"
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <input 
                                    type="file" 
                                    class="form-control"
                                    @input="form.company_logo = $event.target.files[0]"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Skills</h5>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <select v-model="form.skills" class="form-select" multiple>
                                    <option value="Laravel">Laravel</option>
                                    <option value="Inertia">Inertia</option>
                                    <option value="Vue">Vue</option>
                                    <option value="MySQL">MySQL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</AuthenticatedLayout>
</template>

<style scoped>
.card {
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12);
}

.card-title {
    color: #444;
    font-weight: 600;
}

.form-label {
    font-weight: 500;
    color: #555;
}

.form-control, .form-select {
    border-radius: 6px;
    border-color: #ddd;
}

.form-control:focus, .form-select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 0 0.2rem rgba(74,144,226,0.25);
}

.btn-primary {
    background-color: #4a90e2;
    border-color: #4a90e2;
    padding: 8px 24px;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #357abd;
    border-color: #357abd;
}
</style> 