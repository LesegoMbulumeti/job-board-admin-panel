import { useForm, Link } from "@inertiajs/react";
import { useState } from "react";

export default function JobForm({ jobPost = {}, sumbitLable }) {
    //the form state is setup using Inertia's useform helper
    const { data, setData, processing, errors, post, put } = useForm({
        title: jobPost.title ?? "",
        company: jobPost.company ?? "",
        location: jobPost.location ?? "",
        description: jobPost.description ?? "",
        employment_type: jobPost.employment_type ?? "",
        published_at: jobPost.published_at ?? "",
        is_active: jobPost.is_active ?? true,
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        jobPost.id
            ? put(route("admin.jobs.update", jobPost.id)) //update existing job
            : post(route("admin.jobs.store"));
    };

    return (
        <form onSubmit={handleSubmit} className="space-y-4">
            <div>
                <label className="block">Title</label>
                <input
                    type="text"
                    value={data.title}
                    onChange={(e) => setData("title", e.target.value)}
                    className="w-full border p-2 rounded"
                />
            </div>
            {errors.tittle && (
                <div className="text-red-600">{errors.title}</div>
            )}

            <div>
                <label className="block">Company</label>
                <input
                    type="text"
                    value={data.company}
                    onChange={(e) => setData("company", e.target.value)}
                    className="w-full border p-2 rounded"
                />
            </div>
            {errors.tittle && (
                <div className="text-red-600">{errors.company}</div>
            )}

            <div>
                <label className="block">Location</label>
                <input
                    type="text"
                    value={data.location}
                    onChange={(e) => setData("location", e.target.value)}
                    className="w-full border p-2 rounded"
                />
            </div>
            {errors.tittle && (
                <div className="text-red-600">{errors.location}</div>
            )}

            <div>
                <label className="block">Employement Type</label>
                <select
                    type="text"
                    value={data.employment_type}
                    onChange={(e) => setData("employment_type", e.target.value)}
                    className="w-full border p-2 rounded"
                >
                    <option value="">Select Type</option>
                    <option value="full_time">Full Time</option>
                    <option value="part_time">Part Time</option>
                    <option value="contract">Contract</option>
                    <option value="internship">Internship</option>
                </select>
                {errors.tittle && (
                    <div className="text-red-600">{errors.location}</div>
                )}
            </div>

            <div>
                <label className="block">Salary Range</label>
                <input
                    type="text"
                    value={data.salary_range}
                    onChange={(e) => setData("salary_range", e.target.value)}
                    className="w-full border p-2 rounded"
                />
                {errors.salary_range && (
                    <div className="text-red-600">{errors.salary_range}</div>
                )}
            </div>

            <div>
                <label className="block">Description</label>
                <textarea
                    value={data.description}
                    onChange={(e) => setData("description", e.target.value)}
                    className="w-full border p-2 rounded"
                    rows={4}
                />
                {errors.salary_range && (
                    <div className="text-red-600">{errors.description}</div>
                )}
            </div>

            <div>
                <label className="block">Published At</label>
                <input
                    type="datetime-local"
                    value={data.published_at}
                    onChange={(e) => setData("published_at", e.target.value)}
                    className="w-full border p-2 rounded"
                />
                {errors.published_at && (
                    <div className="text-red-600">{errors.published_at}</div>
                )}
            </div>

            <div>
                <label className="inline-flex items-center">
                    <input
                        type="checkbox"
                        checked={data.is_active}
                        onChange={(e) => setData("is_active", e.target.checked)}
                        className="mr-2"
                    />
                    Active
                </label>
            </div>

            <div>
                <label className="inline-flex items-center">
                    <input
                        type="checkbox"
                        checked={data.is_active}
                        onChange={(e) => setData("is_active", e.target.checked)}
                        className="mr-2"
                    />
                    Active
                </label>
            </div>
            <Link
                href={route("admin.jobs.index")}
                className="ml-4 text-gray-600"
            >
                Cancel
            </Link>
        </form>
    );
}
