import { Store } from "@ngrx/store";
import { Injectable } from "@angular/core";

import * as actions from "./content-category.actions";
import { ContentCategory } from "../../models";


@Injectable()
export class ContentCategoryDispatcher {
    constructor(private store: Store) {
    }

    load() {
        return this.store.dispatch(actions.load());
    }

    select(id: number) {
        return this.store.dispatch(actions.select({id}));
    }

    update(category: ContentCategory) {
        return this.store.dispatch(actions.update(category));
    }
}

