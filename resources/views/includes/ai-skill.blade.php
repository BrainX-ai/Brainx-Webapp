
<style>

  
  a {
    text-decoration: none;
    color: #379937;
  }
  

 .dropdown{
    position: relative;
    font-size: 14px;
    color: #333;
    z-index: 1000;
  }
  .dropdown .dropdown-list {
      padding: 12px;
      background: #fff;
      position: absolute;
      top: 30px;
      left: 2px;
      right: 2px;
      box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
      transform-origin: 50% 0;
      transform: scale(1, 0);
      transition: transform .15s ease-in-out .15s;
      max-height: 66vh;
      overflow-y: scroll;
    }
  
    
    .dropdown  .dropdown-option {
      display: block;
      padding: 8px 12px;
      opacity: 0;
      transition: opacity .15s ease-in-out;
    }
    
    .dropdown  .dropdown-label {
      display: block;
      height: 40px;
      background: #fff;
      border: 1px solid #ccc;
      padding: 10px 12px;
      line-height: 1;
      cursor: pointer;
      
      
    }
    .dropdown  .dropdown-label:before {
        content: '▼';
        float: right;
      }
      
    .dropdown.on .dropdown-list {
        transform: scale(1, 1);
        transition-delay: 0s;
     
    }
    .dropdown.on .dropdown-list .dropdown-option {
          opacity: 1;
          transition-delay: .2s;
        }

    .dropdown.on .dropdown-label:before {
        content: '▲';
      }
    
    .dropdown  [type="checkbox"] {
      position: relative;
      top: -1px;
      margin-right: 4px;
    }
    p.keyword{
    background: $fg-color;//#CCCCCC;
    border-radius: 5px;
    border: 1px solid #efefef;
    display: inline-block;
    margin: 5px 5px 0px 0px;
    padding: 3px;
    
    
  }

  p.keyword a.delete{
      cursor: pointer;
      margin:0 3px;
    }

    .inserted{
        margin-bottom: 20px;
    }
</style>

<div class="dropdown  " data-control="checkbox-dropdown">
    <div class="inserted"></div>
  <label class="dropdown-label"><span class="selected-value">Select</span></label>
  
  <div class="dropdown-list">
    {{-- <a href="#" data-toggle="check-all" class="dropdown-option">
      Check All  
    </a> --}}
    
    @foreach ($categories as $category)
        <label class="dropdown-option"> <strong>  {{ $category->category_name }} </strong></label> 
        @foreach ($category->skills as $skill)
        <label class="dropdown-option">
            <input type="checkbox" name="skills[]"  value="{{ $skill->skill_id }}" id="{{ $skill->skill_name }}"  onchange="addToList(this)"/>
            {{ $skill->skill_name }}
        </label>
      
        @endforeach
    @endforeach
    
        
  </div>
</div>
