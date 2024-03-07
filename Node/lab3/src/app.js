// app.js

const express = require('express')
const mongoose = require('mongoose')
const userRoutes = require('../routes/userRoute')
const taskRoutes = require('../routes/taskRoute')

require('dotenv').config()

const app = express()

mongoose.connect(process.env.MONGODB_URI, {
	useNewUrlParser: true,
	useUnifiedTopology: true,
})

app.use(express.json())
app.use('/api', userRoutes,taskRoutes)
// app.use(taskRoutes);

const PORT = process.env.PORT || 3000
app.listen(PORT, () => {
	console.log(`Server is running on port ${PORT}`)
})
