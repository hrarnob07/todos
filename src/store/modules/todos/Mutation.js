export default{
    SET_TODOS_ALL_DATA:(state,data)=>{
        let allData = [];
        let showClr = false;
        data.data.todos.forEach(item => {
            console.log(item);
            let obj={};
            obj['id']=item.id;
            obj['status']=item.status;
            if(item.status == false)
            {
                showClr = true;
            }
            obj['title'] = item.title;
            obj['editable'] = false;
            allData.push(obj);
        });
        state.todos = allData;
        state.showClearBtn = showClr;
    },
    SET_ADD_TODOS:(state,data)=>{       
        let obj= {};
        obj['id']=data.data.todo.id;
        obj['status']=data.data.todo.status;
        obj['title']= data.data.todo.title;
        obj['editable']=false;
        if(data.data.todo.title != '')
        {
            state.todos.push(obj);
        }
        
    },
    SET_TOGGLE_STATUS:(state,data)=>{
        let index = data.index;
        state.todos[index].status = data.status;
        if(data.status == false)
            {
                state.showClearBtn = true;
            }
    },
    SET_TEST:(state,data)=>{
        console.log("data",data);
    },
    SET_EDITABLE_STATUS:(state,data)=>{
        let index = data.index;
        state.todos[index].editable = data.status;
    },
    SET_DELETE_ITEM:(state,data)=>{
       if(data.selectedTab == 0)
       {
         state.todos = state.todos.filter(item => {
                if(item.id != data.data.id)
                {
                    return item;
                }
         });
       }
    },
    SET_CLEAR_TODOS:(state)=>{
        state.todos = [];
    },
}