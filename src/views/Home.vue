<template>
  <div class="home">
   
<el-row :gutter="20">
    <el-col :span="12" :offset="6">
    <div >
      <v-card>
        <v-text-field
           v-model="title"
            placeholder="What needs to be done?"
            :prepend-inner-icon="todos.length > 0? 'mdi-chevron-down': ''"
            solo
            @change="addTodos(title)"
            
          ></v-text-field>
         
        <v-divider style="    margin-top: -30px;"></v-divider>
        
          <v-simple-table v-if="todos.length>0">
            <template v-slot:default>
              <tbody>
                <tr
                  v-for="(item,index) in todos"
                  :key="index"
                >
                  <td style="width:20px;">
                     <v-icon v-if="item.status == true"  @click="toggleStatus(index,!item.status,item)" style="font-size:15px;">mdi-checkbox-blank-circle-outline</v-icon>
                     <v-icon v-else  @click="toggleStatus(index,!item.status,item )" style="font-size:15px;color:green">mdi-check-circle-outline</v-icon>
                  </td>
                  <td @click="editableTrue(index, true)"> <p v-if="item.editable == false" :style="item.status == false ? 'text-decoration:line-through':'' "> {{ item.title }} </p>
                    <v-text-field v-if="item.editable === true" v-model="todos[index].title" @change="updateTodos(index, false,item)">

                    </v-text-field>
                  </td>
                  <td  style="text-align:right" v-if="item.editable === false">
                    <span class="showOnHover" @click="onDelete(item)"><v-icon  style="color:#fc7f7f;cursor:pointer;font-size:15px;">mdi-close-thick</v-icon></span>
                  </td>

                </tr>
                
              </tbody>
            </template>
  </v-simple-table>
     

          </v-card>
            
    </div>
    </el-col>

    <v-card v-if="navTab == true">
      <el-col :span="12" :offset="6"> 
        <v-card style="padding:1px; margin-top:2px">
        <el-row >
         <el-col :span="6">
           <p class="pl-3"> {{todos.length}} <span v-if="todos.length>1">items</span> <span v-else> item</span> left</p>
           </el-col>
         <el-col :span="12">
           <el-button @click="onAllItem(index = 0)" :type="activeTab == 0? '-':'text'"  size="mini" style="color:black">All</el-button> 
           <el-button @click="onAllActive( index = 1)" :type="activeTab == 1? '-':'text'"  size="mini" style="color:black">Active</el-button>
           <el-button @click="onCompleted(index= 2)" :type="activeTab == 2? '-':'text'" size="mini" style="color:black">Completed</el-button>
           </el-col>
          <el-col :span="6">
          <el-button v-if="showClearBtn == true || activeTab ==3" @click="onClearComplete(index= 3)" :type="activeTab == 3? '-':'text'"  size="mini" style="color:black">Clear Completed</el-button>
        </el-col>

      </el-row>
        </v-card>
      
    
    </el-col>
    </v-card>
    
   
</el-row>

   </div>
</template>
 
<script>
  import {mapActions, mapMutations, mapState} from 'vuex';
export default {
  name: 'Home',
  components: {
    
  },
  data() {
    return {
    
      title:'',
      tabChangeStatus: false,
      activeTab:0,
      
      
    }
  },
  computed:{
    ...mapState({
        todos: function(state){
          return state.todos.todos;
        },
        showClearBtn: function(state){
          return state.todos.showClearBtn;
        },
    }),

    navTab: function(){
        if ( this.todos.length >0 || this.tabChangeStatus == true)
        {
            return true; 
        } else {
          return false;
        }
         
    }
  },
watch:{
  
},
    mounted() {
        this.GET_ALL_TODOS();
    },
    methods: {
      ...mapActions({
          GET_ALL_TODOS:'todos/GET_ALL_TODOS',
          ADD_TODOS:'todos/ADD_TODOS',
          UPDATE_TODOS:'todos/UPDATE_TODOS',
          GET_ACTIVE_TODOS:'todos/GET_ACTIVE_TODOS',
          DELETE:'todos/DELETE',
          CLEAR_COMPLETED_TODOS:'todos/CLEAR_COMPLETED_TODOS',
          GET_COMPLETED_TODOS:'todos/GET_COMPLETED_TODOS',
      }),
      ...mapMutations({
        SET_TOGGLE_STATUS:'todos/SET_TOGGLE_STATUS',
        SET_EDITABLE_STATUS:'todos/SET_EDITABLE_STATUS',
        SET_DELETE_ITEM:'todos/SET_DELETE_ITEM',
      }),
    addTodos(value){
      if(value !="")
      {
        this.ADD_TODOS({status: true,title: value})
        
        this.title = '';
      }
      
      
    },
    toggleStatus( index, status,item)
    {
      this.UPDATE_TODOS({id: item.id, data:{status:status,title:item.title }})
      this.SET_TOGGLE_STATUS({index:index,status:status});
    
    },
    editableTrue(index,status,item)
    {
      console.log("status",status);
      console.log("item",item);
      
       this.SET_EDITABLE_STATUS({index:index,status:status});
    },
    updateTodos(index,status,item)
    {
       this.SET_EDITABLE_STATUS({index:index,status:status});
       this.UPDATE_TODOS({id: item.id, data:{status:item.status,title:item.title }})

    },
    onDelete(item){
      this.SET_DELETE_ITEM({data: item,selectedTab: this.activeTab});

      this.DELETE(item.id);
    },
    setActiveTab(index)
    {
      this.activeTab = index;

    },
    onClearComplete(index){
      this.CLEAR_COMPLETED_TODOS();
      this.activeTab = index;
      this.tabChangeStatus= true;
    },
    onAllActive(index)
    {
      this.GET_ACTIVE_TODOS();
      this.activeTab = index;
      this.tabChangeStatus= true;
    },
    onCompleted(index){
      this.GET_COMPLETED_TODOS();
      this.activeTab = index;
      this.tabChangeStatus= true;
    },
    onAllItem(index){
      if(this.activeTab != index)
      {
        this.GET_ALL_TODOS();
        this.activeTab = index;
      }
      this.tabChangeStatus= true;
    }

  },
}
</script>

<style lang='scss'>
  .el-row {
    margin-bottom: 20px;
    &:last-child {
      margin-bottom: 0;
    }
  }
  .el-col {
    border-radius: 4px;
  }
  .bg-purple-dark {
    background: #99a9bf;
  }
  .bg-purple {
    background: #d3dce6;
  }
  .bg-purple-light {
    background: #e5e9f2;
  }
  .grid-content {
    border-radius: 4px;
    min-height: 36px;
  }
  .row-bg {
    padding: 10px 0;
    background-color: #f9fafc;
  }
  .pl-3{
   padding-left: 3px;
  font-size: 11px;
  margin-top: 5px;
  }
  .boder-inactive{
    border: none;
  }
  .small-icon-btn-t{
    font-size: 15px;
  }
  .small-icon-btn-f{
    font-size:15px;
    color:green;
  }
  

table tr td span.showOnHover{
  display: none;
}
table tr:hover {
  td span{
    display:block;
  }
}
</style>
