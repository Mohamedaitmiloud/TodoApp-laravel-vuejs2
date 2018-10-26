var app = new Vue({
    el:'#test',
    data:{
        open:false,
        todos:[],
        user:{
            name:window.laravel.user_name,
        },
        numberCount:{
            all:0,
            left:0,
            completed:0,
        },
        todo:{
            id:0,
            todo:'',
            is_completed:0
        }
    },
    methods:{
        //geting all user todos items
        getData:function(){
            axios.get(window.laravel.url + '/getdata/')
                 .then(response=>{
                     if(response.data.etat){
                         this.user.name = response.data.user;
                         this.todos = response.data.todos;
                         this.count();
                        
                     }
                 })
                 .catch(error=>{
                     console.log('error',error);
                 })
                 
        },
        //add a new todo item
        addTodo:function(){
            axios.post(window.laravel.url+'/addTodo',this.todo)
                 .then(response=>{
                    if(response.data.etat){
                        swal({
                            type: 'success',
                            title: this.todo.todo+' has been added',
                            showConfirmButton: false,
                            timer: 1500
                          });
                          this.todo.id=response.data.id;
                        this.todos.unshift(this.todo);
                        this.count();
                        this.open=false;
                        this.todo = {
                            id:0,
                            todo:'',
                            is_completed:0
                        }
                    }
                 })
                 .catch(error=>{
                     console.log('error',error.data);
                 })
        },
        //marking a todo item completed
        markCompleted:function(todo){
            axios.put(window.laravel.url+'/markcompleted/'+todo.id)
                 .then(response=>{
                    swal({
                        type: 'success',
                        title: 'Good work',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    var positon = this.todos.indexOf(todo);
                    this.todos[positon].is_completed = 1;
                    this.count();
                 })
                 .catch(error=>{
                    console.log('error',error);
                })

        },
        //counting All left completed items
        count:function(){
            this.numberCount.all=0;
            this.numberCount.left=0;
            this.numberCount.completed=0;
            this.numberCount.all = this.todos.length;
            for(var i = 0 ; i<this.todos.length;i++){
                if(this.todos[i].is_completed == 0){
                    this.numberCount.left++;
                }
            }
            this.numberCount.completed = this.numberCount.all - this.numberCount.left;
        },
        //delete method for deleting todo item 
        deleteTodo:function(todo){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                    axios.delete(window.laravel.url+'/deleteTodo/'+todo.id)
                    .then(response=>{
                       if(response.data.etat){
                           var positon = this.todos.indexOf(todo);
                           this.todos.splice(positon,1);
                           this.count();
                       }
                    })
                    .catch(error=>{
                       console.log('error',error);
                   })
                  swal(
                    'Deleted!',
                    todo.todo+' has been deleted.',
                    'success'
                  )
                }
              })

        },
        //close modal ini action
        closeModal:function(){
            this.user.name = window.laravel.user_name;
        },
        //change name
        changeName:function(){
            axios.put(window.laravel.url+'/changeName',this.user)
                 .then(response=>{
                     if(response.data.etat){
                         this.user.name = response.data.name;
                     }
                 })
        },
        validateBeforeSubmit() {
            this.$validator.validateAll().then((result) => {
              if (result) {
                    this.addTodo();
                return;
              }
            });
          }


    },
    created:function(){
        this.getData();
    }
})