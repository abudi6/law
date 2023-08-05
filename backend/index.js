// index.js
import express from "express";
import mongoose from "mongoose";
import cors from 'cors';
import authRouter from "./routes/routes.js"; // Make sure the correct path to authe.js is provided

const app = express();

// Allow requests from http://localhost:3000 (your frontend)
app.use(cors());
app.use(express.json());

// Connect to MongoDB Atlas
mongoose.connect("mongodb+srv://a:a@cluster0.z2vzoef.mongodb.net/", {
  useNewUrlParser: true,
  useUnifiedTopology: true,
})
  .then(() => {
    console.log("Connected to MongoDB Atlas");
  })
  .catch((err) => {
    console.error("Error connecting to MongoDB Atlas:", err);
  });

// Use authRouter for handling user-related routes
app.use("/users", authRouter);

// Start the server
const port = process.env.PORT || 4000;
app.listen(port, () => {
  console.log(`Server started on http://localhost:${port}`);
});
