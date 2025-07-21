import React from 'react';

const Index = ({ jobPost }) => {
  //console.log(jobPost); Debugging line to check jobPost data

   return (
    <div className="max-w-4xl mx-auto px-4 py-8">
      <h1 className="text-3xl font-bold mb-6 text-center">Job Opportunities</h1>
      <div className="grid gap-6">
        {jobPost.data.map((job) => (
          <div
            key={job.id}
            className="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition"
          >
            <h2 className="text-xl font-semibold text-blue-700">{job.title}</h2>
            <p className="text-sm text-gray-600 mb-2">
              {job.company} &middot; {job.location}
            </p>
            <p className="text-gray-700 mb-4 line-clamp-3">{job.description}</p>
            <div className="flex justify-between items-center text-sm text-gray-500">
              <span className="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                {job.employment_type}
              </span>
              <span>{job.salary_range}</span>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};


export default Index;