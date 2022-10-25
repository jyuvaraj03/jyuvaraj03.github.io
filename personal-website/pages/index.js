import Head from 'next/head'
import Image from 'next/image'
import styles from '../styles/Home.module.css'

export default function Home() {
  return (
    <div>
      <nav id="navbar" className={'border border-black'}>
        <div className={'fixed w-full bg-white'}>
          <div className={'container mx-auto flex flex-row justify-between items-center p-4 font-patrick-hand '}><a href="#" className="text-4xl">Yuvaraj</a>
            <div className={'flex flex-row gap-x-4 text-xl'}>
              <a href="#" className="nav-link">Hey there!</a>
              <a href="#" className="nav-link">What do I do?</a>
              <a href="#" className="nav-link">Call me maybe?</a>
            </div>
          </div>
          {/*<a href="javascript:void(0);" onClick="toggleNav()" className="icon"><i className="fas fa-bars"></i></a>*/}
        </div>
      </nav>
      <div id={'intro'} className={'mt-12 bg-purple-700'}>
        <div className={'container mx-auto p-4'}>
          <h1 className={'font-patua-one text-7xl py-12 text-zinc-800'}>Well, hello there!</h1>
          <p className={'font-cabin text-4xl py-2 leading-normal text-white'}>
            Who's this guy? My name is on the top left corner. Allow me to introduce myself: I'm a full stack web
            developer currently working at CASA Retail AI, Chennai. I love to work with code, crack stupid jokes, and sing
            when no one is watching. I am still trying to figure out what I am doing with my life. <span
            className={'font-bold'}>But hey, nice to meet you!</span>
          </p>
        </div>
      </div>
    </div>
  )
}
