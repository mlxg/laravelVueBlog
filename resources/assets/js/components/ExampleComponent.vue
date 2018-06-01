<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">blog</div>

                    <div class="panel-body">
                        <!--<img :width="img.width" :src="img.src" alt=""><br>-->
                        <li v-for="item in todos"
                            :id="item.id"
                            :title="item.title">
                            <a :href="item.src">{{item.title}}</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: [
                    {
                        id: 1,
                        title: '主页',
                        src:'/home'
                    },
                    {
                        id: 2,
                        title: 'Take out the trash',
                    },
                    {
                        id: 3,
                        title: 'Mow the lawn'
                    }
                ],
                img: {
                    src: 'images/test.png',
                    width: '400'
                }
            }
        },
        mounted() {
            var url = 'http://bbstest.kingdee.com/club/school-cloud/rest/relatecourses?action=GET_RELATE_COURSES&size=5&courseId=1021'
            /*this.axios(url, function(data) {
                console.log(data)
                // this.data.getDate = data
            })*/
        }
    }
</script>
