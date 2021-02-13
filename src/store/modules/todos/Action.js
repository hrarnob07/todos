import TodosApi from "../../../api/TodosApi";

export default{
 
    async GET_ALL_TODOS({commit}) {
		commit('SET_CLEAR_TODOS');
		return new Promise((resolve, reject) => {
			TodosApi.getTodos().then(({data}) => {
				console.log("data<<",data);
				commit('SET_TODOS_ALL_DATA',data);
				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async ADD_TODOS({commit},payload) {
		
		return new Promise((resolve, reject) => {
			TodosApi.add(payload).then(({data}) => {
				console.log("data<<",data);
				commit('SET_ADD_TODOS',data);
				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async UPDATE_TODOS({commit},payload) {
		
		return new Promise((resolve, reject) => {
			TodosApi.update(payload.id, payload.data).then(({data}) => {
				console.log("data<<",data);
                commit('SET_TEST',data);

				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async GET_ACTIVE_TODOS({commit}) {
		commit('SET_CLEAR_TODOS');
		return new Promise((resolve, reject) => {
			TodosApi.active().then(({data}) => {
				console.log("data<<",data);
                commit('SET_TODOS_ALL_DATA',data);

				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async GET_COMPLETED_TODOS({commit}) {
		commit('SET_CLEAR_TODOS');
		return new Promise((resolve, reject) => {
			TodosApi.completed().then(({data}) => {
                commit('SET_TODOS_ALL_DATA',data);
				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async DELETE({commit},payload) {
		
		return new Promise((resolve, reject) => {
			TodosApi.delete(payload).then(({data}) => {
				console.log("data<<",data);
                commit('SET_TEST',data);

				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
    async CLEAR_COMPLETED_TODOS({commit}) {
		commit('SET_CLEAR_TODOS');
		return new Promise((resolve, reject) => {
			TodosApi.clearCompleted().then(({data}) => {
				resolve(data);
			}).catch(err => {
				
				reject(err);
			});
		});
	},
}