
import {callToServer} from "./network";

export default {
  getTodos: async () => await callToServer("GET", "/todos"),
  active: async () => await callToServer("GET", "/todos/active"),
  completed: async () => await callToServer("GET", "/todos/completed"),
  add: async (data) => await callToServer("POST", "/todos", data),
  update: async (id,data) => await callToServer("PUT", `/todos/${id}`,data),
  delete: async (id) => await callToServer("DELETE", `/todos/${id}`),
  clearCompleted: async () => await callToServer("POST", `/todos/clear-completed`),

};