const express = require('express');
const Law = require('../models/law'); // Import the Law model if it's defined in a separate file
const router = express.Router();

// Route to retrieve all law content
router.get('/api/laws', async (req, res) => {
  try {
    // Retrieve all law content from the database
    const allLaws = await Law.find();

    // Respond with the retrieved law data as a JSON array
    res.status(200).json(allLaws);
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

module.exports = router;
