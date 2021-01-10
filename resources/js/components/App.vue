<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                    <tr v-for="project in projects">
                        <td>{{ project.name }}</td>
                        <td><input type="number" placeholder="Start" v-model="project.start" /></td>
                        <td><input type="number" placeholder="End" v-model="project.end" /></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-8">
                graph
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            projects: [
                {
                    name: 'oui',
                    start: 1,
                    end: 15
                },
                {
                    name: 'non',
                    start: 3,
                    end: 10
                }
            ]
        }),
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addProject(project) {
                this.projects.push(project)
            }
        }
    }
</script>

<style lang="scss" scoped>
table {
    input {
        width: 50px;
    }
}
</style>
