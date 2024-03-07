const express = require('express')
const router = express.Router()
const taskController = require('../controllers/taskController')

router.post('/tasks', taskController.createTask)
router.get('/tasks', taskController.getAllTasks)
router.get('/tasks/:id', taskController.getTaskById)
router.delete('/tasks/:id', taskController.deleteTaskById)

module.exports = router
