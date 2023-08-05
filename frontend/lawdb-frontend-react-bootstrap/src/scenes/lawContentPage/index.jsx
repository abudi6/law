import React, { useState, useEffect } from 'react';
  import { useParams } from 'react-router-dom';
  import axios from 'axios';
  import '../../styles/general.css';
  import '../../styles/content.css';

const LawContentPage = () => {
  const [lawContent, setLawContent] = useState(null);

  useEffect(() => {
    // Sample data object to populate the page
    const sampleLawData = {
      lawTitle: 'Sample Law Title 1',
      headings: [
        {
          headingTitle: 'Sample Heading 1',
          sections: [
            {
              content:
                'Section 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa sed elementum tempus. Ornare aenean euismod elementum nisi quis eleifend quam.',
            },
            {
              content:
                'Section 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa sed elementum tempus. Ornare aenean euismod elementum nisi quis eleifend quam.',
            },
          ],
        },
        {
          headingTitle: 'Sample Heading 2',
          sections: [
            {
              content:
                'Section 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa sed elementum tempus. Ornare aenean euismod elementum nisi quis eleifend quam.',
            },
            {
              content:
                'Section 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa sed elementum tempus. Ornare aenean euismod elementum nisi quis eleifend quam.',
            },
          ],
        },
      ],
    };

    // Set the law content based on the sample data
    setLawContent(sampleLawData);
  }, []);

  if (!lawContent) {
    return (
      <div className="container-fluid d-flex align-items-center justify-content-center text-center">
        <div>
          <img src="/logo.png" className="loading-logo mb-5" alt="LawPhil Logo" />
          <h5>Loading...</h5>
        </div>
      </div>
    );
  }

  // Function to find and replace the "Section <number>." pattern with bold text
  const highlightSections = (content) => {
    const sectionPattern = /Section \d+\./g;
    return content.replace(sectionPattern, (match) => `<strong>${match}</strong>`);
  };

  return (
    <div className="container law-content">
      <h2 className="mb-3">{lawContent.lawTitle}</h2>

      {/* Loop through headings and sections and display heading and content */}
      {lawContent.headings.map((heading, headingIndex) => (
        <div key={headingIndex}>
          <h5 className="my-5">{heading.headingTitle.toUpperCase()}</h5>

          {/* Loop through sections and display content */}
          {heading.sections.map((section, sectionIndex) => (
            <p
              className="px-5"
              key={sectionIndex}
              dangerouslySetInnerHTML={{ __html: highlightSections(section.content) }}
            />
          ))}
        </div>
      ))}
    </div>
  );
};

export default LawContentPage;
