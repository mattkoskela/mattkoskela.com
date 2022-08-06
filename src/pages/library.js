import * as React from "react"

import Navi from "../components/Navi"


const Page = () => {
  return (
    <main>
      <h1>
        Library
      </h1>
      <Navi />
    </main>
  )
}

export default Page

export const Head = () => <title>Matt Koskela | Library</title>
