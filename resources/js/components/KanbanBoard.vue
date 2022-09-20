<template>
  // ...
  <AddTaskForm
    v-if="newTaskForStatus === status.id"
    :status-id="status.id"
    v-on:task-added="handleTaskAdded"
    v-on:task-canceled="closeAddTaskForm"
  />
  // Add this just above our list of tasks
  <!-- Tasks -->
  //...
  <!-- No Tasks -->
  // Update the placeholder to include a click handler to create a new task
  // and hide it when the form is open
  <div
    v-show="!status.tasks.length && newTaskForStatus !== status.id"
    class="flex-1 p-4 flex flex-col items-center justify-center"
  >
    <span class="text-gray-600">No tasks yet</span>
    <button
      class="mt-1 text-sm text-orange-600 hover:underline"
      @click="openAddTaskForm(status.id)"
    >
      Add one
    </button>
  </div>
  <!-- ./No Tasks -->
</template>

<script>
import AddTaskForm from "./AddTaskForm"; // import the component

export default {
  components: { AddTaskForm }, // register component

  data() {
    return {
      statuses: [],

      newTaskForStatus: 0 // track the ID of the status we want to add to
    };
  },
  //
  methods: {
    // set the statusId and trigger the form to show
    openAddTaskForm(statusId) {
      this.newTaskForStatus = statusId;
    },
    // reset the statusId and close form
    closeAddTaskForm() {
      this.newTaskForStatus = 0;
    },
    // add a task to the correct column in our list
    handleTaskAdded(newTask) {
      // Find the index of the status where we should add the task
      const statusIndex = this.statuses.findIndex(
        status => status.id === newTask.status_id
      );

      // Add newly created task to our column
      this.statuses[statusIndex].tasks.push(newTask);

      // Reset and close the AddTaskForm
      this.closeAddTaskForm();
    },
  }
};
</script>
