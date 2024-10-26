// src/app/page.tsx

import Image from 'next/image';

interface Project {
  title: string;
  description: string;
  link: string;
}

const projects: Project[] = [
  {
    title: 'Project 1',
    description: 'Description of project 1',
    link: 'https://project1.com',
  },
  {
    title: 'Project 2',
    description: 'Description of project 2',
    link: 'https://project2.com',
  },
  // Add more projects as needed
];

export default function Home() {
  return (
    <main className="flex min-h-screen flex-col items-center justify-between p-24">
      <header className="z-10 w-full max-w-5xl text-center">
        <h1 className="text-4xl font-bold mb-4">My Portfolio</h1>
        <p className="text-xl">Welcome! Check out my projects below.</p>
      </header>

      <section className="relative text-center my-12">
        <p>Coming soon ⏳...</p>
        <p>Sedang Sibuk Kerja dunia Kontraktor dan Container, Besok Baru GASS!!❤️</p>
      </section>

      <section className="mb-32 grid text-center lg:grid-cols-4 lg:text-left gap-8">
        {projects.map((project, index) => (
          <a
            key={index}
            href={project.link}
            className="group rounded-lg border border-transparent px-5 py-4 transition-colors hover:border-gray-300 hover:bg-gray-100 hover:dark:border-neutral-700 hover:dark:bg-neutral-800/30"
            target="_blank"
            rel="noopener noreferrer"
          >
            <h2 className="mb-3 text-2xl font-semibold">
              {project.title}
              <span className="inline-block transition-transform group-hover:translate-x-1 motion-reduce:transform-none">
                -&gt;
              </span>
            </h2>
            <p className="m-0 max-w-[30ch] text-sm opacity-50">{project.description}</p>
          </a>
        ))}
      </section>

      <footer className="text-center">
        <p>by: maspimen & og</p>
      </footer>
    </main>
  );
}
