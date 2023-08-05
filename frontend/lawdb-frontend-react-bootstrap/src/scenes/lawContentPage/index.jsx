import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import '../../styles/general.css';
import '../../styles/content.css';

/* Law Content Checklist:
 * [ ] Connect to the database to fetch the law content using: lawId, lawTitle, headings, sections, content
 * [ ] Fix up the properties to match the database/ERD - if possible (again, mb!)
 * [?] is only having index.jsx for lawContent enough - should there be a separate jsx for something?
*/

const LawContentPage = () => {
  const { lawId } = useParams();
  const [lawContent, setLawContent] = useState(null);

  useEffect(() => {
    // Make an HTTP request to fetch the law data
    axios.get(`/api/laws/${lawId}`)
      .then((response) => {
        setLawContent(response.data); // Update the state with the fetched law data
      })
      .catch((error) => {
        console.error('Error fetching law data:', error);
      });
  }, [lawId]);

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

