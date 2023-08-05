//authe.js
import bcrypt from "bcrypt";
import User from "../models/User.js";
import express from "express";

export const register = async (req, res) => {
  try {
    const { email, username, password } = req.body;

    const salt = await bcrypt.genSalt();
    const passwordHash = await bcrypt.hash(password, salt);

    const newUser = new User({
      username,
      password: passwordHash,
      email,
    });

    const savedUser = await newUser.save();
    res.status(201).json(savedUser); // 'something has been created'
  } catch (err) {
    res.status(500).json({ error: err.message }); // 'server error'
  }
};



export const login = async (req, res) => {
  try {
    const { username, password } = req.body;
    
    console.log("Request data:", username, password);

    // Find the user by username
    const user = await User.findOne({ username });

    console.log("User data:", user);

    // If the user is not found, return an error response
    if (!user) {
      return res.status(404).json({ error: "User not found" });
    }

    // Compare the provided password with the hashed password stored in the database
    const isPasswordMatch = await bcrypt.compare(password, user.password);

    console.log("Password match:", isPasswordMatch);

    // If the passwords don't match, return an error response
    if (!isPasswordMatch) {
      return res.status(401).json({ error: "Invalid credentials" });
    }

    // If the passwords match, the login is successful
    // You can create a session or generate a token for authentication here if needed
    res.json({ message: "Login successful" });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
};

const router = express.Router();

// Register route
router.post("/register", register);

// Login route
router.post("/login", login);

export default router;
