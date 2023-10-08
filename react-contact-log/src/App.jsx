import "./App.css";
import ContactLog from "./components/Contact-log";
import CrudButtons from "./components/Crud-buttons";

function App() {
  

  return(
    <div className="flex flex-col w-auto h-screen justify-center">
      <ContactLog/>
      <CrudButtons/>
    </div>
  )
}

export default App;
